const btn = document.querySelector('#edit-btn')
const form = document.querySelector('#edit-form')
const btn_cancel = document.querySelector('#cancel-btn')

if (btn && form) {
    btn.addEventListener('click', () => {
        form.style.display = "flex"
        btn.style.display = "none"
    })

    form.addEventListener('submit', () => {
        form.style.display = "none"
        btn.style.display = "block"
    })

    btn_cancel.addEventListener('click', () => {
        btn.style.display = 'block'
        form.style.display = 'none'
        form.reset()
    })
}