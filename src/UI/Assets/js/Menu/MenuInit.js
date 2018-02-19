(function () {


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
        menuItemTemplate(data) {
            let sup = "";

            if (data.sup)
                data.sup.forEach((item) => sup += this.menuItemTemplate(item));

            return `<li class="item">
                    <div>
                        <i class="fa fa-ellipsis-v portlet-header"></i>
                        <h4 class="txt">${data.name}</h4>
                        <div class="pull-right">
                            <i class="fa fa-plus portlet-header showMore"></i>
                            <i class="fa fa-times portlet-header removeItem"></i>
                        </div>
                    </div>
                    <div style="display: none" class="item-details">
                        <h1>sdfdsfsd</h1>
                    </div>
                    <ul class="uiList sortable2 sup">${sup}</ul>
                </li>`;
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
        render(data) {
            data.then((items) => {
                items.forEach((item) => $(this.mainMenuClass).append(this.menuItemTemplate(item)));
                this.addNewItemButton();
                this.addSortEvent();
            })
        }
    }

    let v = new Promise((res, err) => setTimeout(() => res(
        [
            {
                name: "men1"
            },
            {
                name: "men2",
                sup:
                    [
                        {
                            name: "sup1"
                        },
                        {
                            name: "sup2"
                        }
                    ]
            }
        ]
    ), 1000));


    /**
     *
     * @type {string}
     */
    let mainMenu = ".mainMenu";
    let sortableClass = ".sortable2";


    /*
     *
     */
    new renderMenu({sortableClass, mainMenu}).render(v);


    /*
     *
     */
    $("#saveMenu").click(function () {
        console.log($(mainMenu).children().length);
    });

    $("body").on("click", ".removeItem", function () {
        /// logic for remove iem  form list
        console.log("removeItem");
    });

    $("body").on("click", ".showMore", function () {
        $(this).closest(".item").find(">.item-details").slideToggle();
    })
})();