document.addEventListener("DOMContentLoaded", function () {
    const hambuger = document.querySelector(".hambuger");
    const sidebar = document.querySelector(".sidebar_wrap");

    hambuger.addEventListener("click", function () {
        if (window.innerWidth <= 792) {
            sidebar.classList.toggle("active");  // 새 창 띄우기/닫기
            hambuger.classList.toggle("active"); // X 표시 유지 & 복구

            if (sidebar.classList.contains("active")) {
                document.documentElement.classList.add("noscroll"); // 스크롤 없애기
                document.body.classList.add("noscroll");
            } else {
                document.documentElement.classList.remove("noscroll"); // 스크롤 복구
                document.body.classList.remove("noscroll");
            }
        }
    });
});
