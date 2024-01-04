const catalog_btn= document.querySelector('#catalog-button-link')
const catalog_submenu = document.querySelector('#catalog-submenu')
let isCatalogClosed = true

if (catalog_btn && catalog_submenu) {
    catalog_btn.addEventListener('click', (e) => {
        if(isCatalogClosed) e.preventDefault()
        isCatalogClosed = false
        catalog_submenu.style.display = 'flex'
    })
    window.addEventListener('click', (e) => {
        if(e.target.closest('#catalog-menu') === null) {
            catalog_submenu.style.display = 'none'
            isCatalogClosed = true

        }
    })
}