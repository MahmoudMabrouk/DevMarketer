const accordtions = document.getElementsByClassName('has-submenu')
const adminSlideoutButton = document.getElementById('admin-slidout-button')

    adminSlideoutButton.onclick = function () {
        this.classList.toggle('is-active');
        document.getElementById('admin-side-menu').classList.toggle('is-active');
      }

    for (var i = 0; i < accordtions.length ;i++) {
        if(accordtions[i].classList.contains('is-active')){
            
            const submenu = accordtions[i].nextElementSibling;

            submenu.style.maxHeight = submenu.scrollHeight + 'px';
            submenu.style.marginTop = "0.75em"
            submenu.style.marginBotton = "0.75em"
        }
        accordtions[i].onclick = function(){
        this.classList.toggle('is-active')

        const submenu = this.nextElementSibling
        if (submenu.style.maxHeight) {
            // menu is open , we need to close it now
            submenu.style.maxHeight = null
            submenu.style.marginTop = null
            submenu.style.marginBotton = null
        } else {
            // menu is close , we need to open it now
            submenu.style.maxHeight = submenu.scrollHeight + 'px'
            submenu.style.marginTop = "0.75em"
            submenu.style.marginBotton = "0.75em"
        }
    }
    
}