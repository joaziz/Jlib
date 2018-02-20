(function () {

    // data = {
    //
    //     menus: [
    //         {
    //             name: "",
    //             link: "",
    //             attr: {},
    //             auth: [],
    //             sup: []
    //
    //         }
    //
    //     ]
    //
    //
    // }


    class MenuHtml {

        constructor() {
            this.menus = [];
        }

        addMenuItems(items) {
            this.menus = items;
            return this;
        }

        addTagetOptions(items) {
            this.targetOptions = items;
            return this;
        }

        _cNameFiled(name) {
            return `<label>Name</label><input class="sm-input linkName" name="name" value="${name}"><br/>`;
        }

        _cLinkFiled(name) {
            return `<label>Link</label><input class="sm-input" name="link" value="${name || ""}"><br/>`;
        }
        _cIconFiled(name) {
            return `<label>icon</label><input class="sm-input" name="attr['icon']"><br/>`;
        }

        menuItemTemplate(meun) {
            let sup = "";

            if (meun.sup)
                meun.sup.forEach((item) => sup += this.menuItemTemplate(item));

            return `<li class="item">
                    <div>
                        <i class="fa fa-ellipsis-v portlet-header"></i>
                        <h4 class="txt">${meun.name}</h4>
                        <div class="pull-right">
                            <i class="fa fa-plus portlet-header showMore"></i>
                            <i class="fa fa-times portlet-header removeItem"></i>
                        </div>
                    </div>
                    <div  class="item-details">
                  
                           <form>          
                           ${this._cNameFiled(meun.name)}
                           ${this._cLinkFiled(meun.link)}
                           ${this._cIconFiled(meun.link)}
                           
                         
                           <label>target</label>
                                                       <input class="sm-input" name="attr['_tagrget']">
                                <br/>
                          
                            </form>                    
                       
                    </div>
                    <ul class="uiList sortable2 sup">${sup}</ul>
                </li>`;

        }

        render() {
            return this.menuItemTemplate(this.menus);
        }
    }


    /**
     *
     */
    class renderMenu {
        constructor(opt) {
            this.sortableClass = opt.sortableClass;
            this.mainMenuClass = opt.mainMenu;
            this.newItemButton = $(`<ul class="uiList"><li class="item text-center newItem"><div><h4 id="newMenu" class="txt">new Item</h4></div></li></ul>`);
        }


        /**
         *
         * @param data
         * @returns {string}
         */
        menuItemTemplate(meuns) {
            return new MenuHtml().addMenuItems(meuns).render();
        }

        /**
         *
         */
        addNewItemButton() {
            $(this.newItemButton).click(() => {
                $(this.mainMenuClass).append(this.menuItemTemplate({name: "new item"}));
                this.addSortEvent();
            }).insertAfter(this.mainMenuClass);
        }

        /**
         *
         */
        addSortEvent() {
            $(this.sortableClass).sortable({placeholder: "ui-state-highlight", connectWith: this.sortableClass});
            $(this.sortableClass).disableSelection();
        }

        /**
         *
         * @param data
         */
        render() {

            new Promise((res) => res({}))
                .then(async (data) => {
                    data.menus = await Resourse.Menus.getAll();
                    return data;
                })
                .then(async (data) => {
                    data.options = await  Resourse.likOptions.getAll();
                    return data;
                })
                .then((data) => {
                    data.menus.forEach((item) => {
                            $(this.mainMenuClass).append(this.menuItemTemplate(item));
                        }
                    );
                })
                .then(() => {
                    this.addNewItemButton();
                    this.addSortEvent();
                })
        }
    }

    let MenuData = {

        add: function (childres) {
            let data = [];
            childres.each(function () {
                // init current info var
                let currentItemInfo = {};
                /*
                 * gathering informations
                 */
                $(this).find(">.item-details form").serializeArray().forEach((item) => {
                    currentItemInfo[item.name] = item.value;
                });

                /*
                 * add sup menu info
                 */

                let ch = $(this).find(">.sup").children();
                if (ch.length > 0)
                    currentItemInfo.sup = MenuData.add(ch);


                /*
                 * push it to main main object
                 */
                data.push(currentItemInfo);
            });
            return data;
        }
    };


    /**
     *
     * @type {string}
     */
    let mainMenu = ".mainMenu";
    let sortableClass = ".sortable2";


    /*
     * genrate html
     */
    new renderMenu({sortableClass, mainMenu}).render();


    /*
     *
     */
    $("#saveMenu").click(function () {
        let menu = MenuData.add($(mainMenu).children());
        console.log(menu);
    });

    $("body").on("click", ".removeItem", function () {
        /// logic for remove iem  form list
        console.log("removeItem");
    });

    $("body").on("click", ".showMore", function () {
        $(this).closest(".item").find(">.item-details").slideToggle();
    });

    $("body").on("keyup", ".linkName", function () {
        $(this).closest(".item").find(">div>h4.txt").text($(this).val());
    });

})();