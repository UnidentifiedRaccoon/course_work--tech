const btn = document.querySelector('#edit-btn')
const btn_cancel = document.querySelector('#cancel-btn')
const form = document.querySelector('#edit-form')
const textarea = document.querySelector('#content')
const zone = document.querySelector("#edit-zone")

if (btn && form && zone) {
    btn.addEventListener('click', () => {
        const tmpHTML = zone.innerHTML
        zone.innerHTML = ''
        btn.style.display = 'none'
        form.style.display = 'flex'
        textarea.value = tmpHTML

        btn_cancel.addEventListener('click', () => {
            btn.style.display = 'block'
            form.style.display = 'none'
            zone.innerHTML = tmpHTML
        })
    })
}