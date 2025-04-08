function slowScrollToTop() {
    const scrollStep = -window.scrollY / 50; // Hoeveel pixels per frame scrollen
    function scroll() {
        if (window.scrollY > 0) {
            window.scrollBy(0, scrollStep); // Scroll beetje bij beetje omhoog
            requestAnimationFrame(scroll); // Volgende frame
        }
    }
    requestAnimationFrame(scroll);
}