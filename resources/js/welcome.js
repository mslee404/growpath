document.addEventListener("DOMContentLoaded", function () {
  gsap.ticker.fps(120);

  const tl = gsap.timeline({
    defaults: { duration: 0.45, ease: "power4.out" }
  });

  tl.to(".branding", {
    x: "-22vw",
    duration: 0.45
  });

  tl.to(".white-panel", {
    x: "-100%",
    duration: 0.45
  }, "-=0.3");

  tl.to(".orange-inner", {
    width: "50%",
    duration: 0.4,
    ease: "power3.inOut"
  }, "-=0.35");

  // Redirect ke login setelah animasi
  tl.call(() => {
    setTimeout(() => {
      window.location.href = "/login";
    }, 100);
  });
});
