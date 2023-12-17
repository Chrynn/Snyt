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

export function showLogin() {
    const iconUserDivClass = '.js-show-login';
    const loginDivClass = '.login', loginDivClassModifier = 'login--active';
    const iconCrossClass = '.login__icon-cross';
    const scrollDisabledClass = 'scroll-disabled';

    const iconUserDiv = document.querySelector(iconUserDivClass);
    const loginDiv = document.querySelector(loginDivClass);
    const iconCross = document.querySelector(iconCrossClass);
    const bodyTag = document.querySelector("body");

    iconUserDiv.addEventListener('click', () => {
        loginDiv.classList.add(loginDivClassModifier);
        bodyTag.classList.add(scrollDisabledClass);
    });

    iconCross.addEventListener('click', () => {
        loginDiv.classList.remove(loginDivClassModifier);
        bodyTag.classList.remove(scrollDisabledClass);
    });
}
showLogin();
