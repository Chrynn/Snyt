export function headerScroll() {
    const headerClass: string = '.header', headerClassModifier: string = 'header--active';
    const header: HTMLElement|null = document.querySelector(headerClass);

    if (header) {
        window.addEventListener('scroll', headerAnimate);
    }

    function headerAnimate() {
        const scrollFromTop: number = document.documentElement.scrollTop - (document.documentElement.clientTop || 0);

        if (scrollFromTop > 0) {
            header?.classList.add(headerClassModifier);
        } else {
            header?.classList.remove(headerClassModifier);
        }
    }

}
headerScroll();
