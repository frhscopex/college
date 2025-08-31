document.addEventListener('DOMContentLoaded', function () {

    if (document.querySelector(".hero h1")) {
        gsap.from(".hero h1", { y: 80, opacity: 0, duration: 1.2, ease: "power4.out" });
        gsap.from(".hero p", { y: 40, opacity: 0, duration: 1, delay: 0.5, ease: "power3.out" });
    }

    if (document.querySelector(".contact-glass")) {
        gsap.to(".contact-glass", {
            y: 0,
            opacity: 1,
            duration: 1.2,
            ease: "power4.out"
        });
    }

    gsap.utils.toArray(".glass").forEach((el, i) => {
        gsap.to(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 85%",
                toggleActions: "play none none reverse"
            },
            y: 0,
            opacity: 1,
            duration: 1,
            ease: "power3.out",
            delay: i * 0.1
        });
    });

    const sections = document.querySelectorAll("section[id]");
    const navLinks = document.querySelectorAll("nav ul li a");

    if (sections.length > 0 && navLinks.length > 0) {
        window.addEventListener("scroll", () => {
            let current = "";
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 150;
                if (window.scrollY >= sectionTop) {
                    current = section.getAttribute("id");
                }
            });

            navLinks.forEach(link => {
                link.classList.remove("active");
                if (link.getAttribute("href") === "#" + current) {
                    link.classList.add("active");
                }
            });
        });
    }
});