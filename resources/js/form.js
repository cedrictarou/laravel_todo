// formのactionを切り替えるための処理

const btns = document.querySelectorAll(".btn");
btns.forEach((btn) => {
    btn.addEventListener("click", () => {
        // e.preventDefault();
        // formタグの取得
        const form = btn.closest("form");

        if (btn.classList.contains("btn--update")) {
            const btnAttr = btn.dataset.action;
            form.setAttribute("action", btnAttr);
            // console.log(form);
        } else if (btn.classList.contains("btn--delete")) {
            const btnAttr = btn.dataset.action;
            form.setAttribute("action", btnAttr);
            // console.log(form);
        } else {
            return;
        }
    });
});
