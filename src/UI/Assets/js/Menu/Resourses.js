let Resourse = {
    Menus: {
        getAll: async () => {
            return await new Promise((res, err) => setTimeout(() => res(
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
            ), 200));

        }

    },
    likOptions: {
        getAll: async () => {
            return await new Promise((res) => {
                setTimeout(() => {
                    res({_blank: "_blank"});
                }, 200)
            });
        }
    }

};