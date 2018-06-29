class Toast {
    constructor(message, config) {
        config = config || {};
        this.position = config.position || 'center';
        this.timeout = config.timeout || 3000;
        this.animationDuration = config.animationDuration || 400;

        this.message = message;

        this.create();
    }

    create() {
        let toast = document.createElement('div');
        toast.classList.add('toast__container--' + this.position);
        toast.innerHTML = "<div class='toast'><p>" + this.message + "</p></div>";
        document.body.appendChild(toast);

        toast.show = () => {
            toast.childNodes[0].classList.add('active');
            setTimeout(() => {
                toast.hide();
            }, this.timeout);
        };
        toast.hide = () => {
            toast.childNodes[0].classList.replace('active', 'closing');
            setTimeout(() => {
                toast.remove();
            }, this.animationDuration);
        };
        toast.show();
    }
}