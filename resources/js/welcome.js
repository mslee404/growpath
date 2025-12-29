document.addEventListener("DOMContentLoaded", function () {
  gsap.ticker.fps(120);
  let mm = gsap.matchMedia();

  // --- ANIMASI DESKTOP (Horizontal Slide) ---
  mm.add("(min-width: 1025px)", () => {
    const tl = gsap.timeline({
      defaults: { duration: 0.6, ease: "power4.inOut" }
    });

    tl.to(".branding", {
      x: "-25vw",
    })
    .to(".white-panel", {
      x: "-100%",
    }, "-=0.6")
    .to(".orange-inner", {
      width: "50%",
      borderTopRightRadius: "1rem",
      borderBottomRightRadius: "1rem"
    }, "-=0.6")
    .call(() => {
        window.location.href = "/login";
    });
  });

  // --- ANIMASI MOBILE (FADE OUT) ---
  mm.add("(max-width: 1024px)", () => {
    const tl = gsap.timeline({
      defaults: { duration: 0.8, ease: "power2.inOut" }
    });

    // Efek Fade: Semua elemen di orange-panel menghilang pelan-pelan
    tl.to(".orange-panel", {
      opacity: 0,
      duration: 0.8,
    })
    .call(() => {
      // Redirect ke login
      window.location.href = "/login";
    });
  });
});