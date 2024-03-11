(() => {
    "use strict";
    function isWebp() {
        function testWebP(callback) {
            let webP = new Image;
            webP.onload = webP.onerror = function() {
                callback(webP.height == 2);
            };
            webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
        }
        testWebP((function(support) {
            let className = support === true ? "webp" : "no-webp";
            document.documentElement.classList.add(className);
        }));
    }
    let addWindowScrollEvent = false;
    setTimeout((() => {
        if (addWindowScrollEvent) {
            let windowScroll = new Event("windowScroll");
            window.addEventListener("scroll", (function(e) {
                document.dispatchEvent(windowScroll);
            }));
        }
    }), 0);
    window.addEventListener("load", (function(e) {
        const section = document.querySelector(".image-block");
        const content = section.querySelector(".image-block__content");
        const clone = document.querySelector(".image-block--hide");
        const cloneContent = clone.querySelector(".image-block__content");
        const offsetTop = section.offsetTop;
        let lastTranslate = 0;
        window.addEventListener("scroll", (function(e) {
            const currentScroll = window.scrollY;
            const sectionHeight = section.offsetHeight;
            const windowHeight = window.innerHeight;
            if (currentScroll >= offsetTop && currentScroll <= offsetTop + sectionHeight) {
                const translate = (currentScroll - offsetTop) / sectionHeight * (windowHeight - content.offsetHeight);
                section.classList.add("fixed");
                content.classList.add("show");
                lastTranslate = translate;
                content.style.transform = `translateY(-${translate}px)`;
            } else {
                section.classList.remove("fixed");
                cloneContent.style.transform = `translateY(-${lastTranslate}px)`;
                if (currentScroll > offsetTop + sectionHeight) {
                    clone.classList.add("active");
                    cloneContent.classList.add("show");
                } else cloneContent.classList.remove("show");
                if (clone.getBoundingClientRect().top < 0) clone.classList.remove("active");
                if (currentScroll < offsetTop) content.classList.remove("show");
            }
        }));
    }));
    window["FLS"] = true;
    isWebp();
})();