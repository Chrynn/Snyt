export function pageScroll(): void {
    const clickButtonClass: string = '.banner__icon-arrow-dropdown-thin';
    const clickButton: HTMLElement|null = document.querySelector(clickButtonClass);
    const scrollSize: number = 720;

    if (clickButton) {
        clickButton.addEventListener('click', () => {
            window.scrollTo({
                top: scrollSize,
                behavior: 'smooth'
            });
        });
    }
}
pageScroll();

export function advertCarousel(): void {
    const advertCarouselClass: string = '.review__item-wrap';
    const arrowClass: string = '.review__icon-arrow-dropdown-thin';
    const carouselItemClass: string = '.review__item';
    const advertItemRowClass: string = '.review__row';
    const arrowLeftId: string = 'review__icon-arrow-dropdown-thin review__icon-arrow-dropdown-thin--left';

    const carousel: HTMLElement|null = document.querySelector(advertCarouselClass);
    const arrowIcons = document.querySelectorAll(arrowClass) as unknown as Array<SVGElement>;
    const advertItemRow: HTMLElement|null = document.querySelector(advertItemRowClass);
    const advertItemFirst: Element|null = advertItemRow.querySelectorAll(carouselItemClass)[0];

    let isDragStart: boolean = false;
    let isScrollAtEnd: boolean = false, isScrollAtStart: boolean = true;
    let prevPageX: number;
    let prevScrollLeft: number;
    let scrollLeftNumber: number = 0;

    if (carousel) {
        arrowIcons.forEach(arrowIcon => {
            arrowIcon.addEventListener('click', () => {
                const firstImgWidth: number = advertItemFirst.clientWidth + 20;
                const isIconLeft: boolean = arrowIcon.id === arrowLeftId;

                isScrollAtStart = getIsScrollAtStart();
                isScrollAtEnd = getIsScrollAtEnd();

                if ((isIconLeft && isScrollAtStart) || (!isIconLeft && isScrollAtEnd)) {
                    return;
                }

                scrollLeftNumber += isIconLeft ? -firstImgWidth : firstImgWidth;
                carousel.scrollLeft = scrollLeftNumber;

                isScrollAtStart = getIsScrollAtStart();
                isScrollAtEnd = getIsScrollAtEnd();

                showOrHideArrowIcons(isScrollAtStart, isScrollAtEnd);
            });
        });

        const dragStart = (event: MouseEvent): void => {
            isDragStart = true;
            prevPageX = event.pageX;
            prevScrollLeft = carousel.scrollLeft;
        }

        const dragging = (event: MouseEvent): void => {
            if (!isDragStart) {
                return;
            }

            event.preventDefault();

            const positionDiff: number = event.pageX - prevPageX;

            scrollLeftNumber = prevScrollLeft - positionDiff;
            carousel.scrollLeft = scrollLeftNumber;

            isScrollAtStart = getIsScrollAtStart();
            isScrollAtEnd = getIsScrollAtEnd();

            showOrHideArrowIcons(isScrollAtStart, isScrollAtEnd);
        };

        const dragStop = (): void => {
            isDragStart = false;
        }

        const showOrHideArrowIcons = (isScrollAtStart: boolean, isScrollAtEnd: boolean): void => {
            let iconLeft: CSSStyleDeclaration|null = arrowIcons[0].style, iconRight: CSSStyleDeclaration|null = arrowIcons[1].style;

            const opacityFaded: string = '0.3';
            const opacityFull: string = '1';

            const cursorArrow: string = 'inherit';
            const cursorClick: string = 'pointer';

            if (isScrollAtStart) {
                iconLeft.opacity = opacityFaded;
                iconLeft.cursor = cursorArrow;
            } else {
                iconLeft.opacity = opacityFull;
                iconLeft.cursor = cursorClick;
            }

            if (isScrollAtEnd) {
                iconRight.opacity = opacityFaded;
                iconRight.cursor = cursorArrow;
            } else {
                iconRight.opacity = opacityFull;
                iconRight.cursor = cursorClick;
            }
        };

        const getIsScrollAtStart = (): boolean => {
            return scrollLeftNumber <= 0;
        }

        const getIsScrollAtEnd = (): boolean => {
            const scrollWidth: number = carousel.scrollWidth - carousel.clientWidth + 20;

            return scrollLeftNumber >= scrollWidth;
        }

        carousel.addEventListener('mousedown', dragStart);
        carousel.addEventListener('mousemove', dragging);
        carousel.addEventListener('mouseup', dragStop);
        carousel.addEventListener('mouseleave', dragStop);
    }
}
advertCarousel();
