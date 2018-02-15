LaravelErrors = function (errors) {
    localStorage.setItem("L_ERR", JSON.stringify(errors));
    let render = function (err) {

        $(".olderrorP").remove();

        for (var i in err) {

            var input = $("[name=" + i + "]")

            for (var ind in err[i]) {
                var ms = "validation error on: " + err[i][ind]
                input.after(" <span style='display: block;margin: 2px' class='olderrorP text-danger'>" + err[i][ind] + "</span>")
            }

        }
    }
    return {
        getLast: function () {
            render(JSON.parse(localStorage.getItem("L_ERR")));
        }, clear: function () {
            localStorage.removeItem("L_ERR")
        },
        showHints: function () {
            render(errors);
        }
    }
}