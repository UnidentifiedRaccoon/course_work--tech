const btn = document.querySelector('#edit-btn')
const form = document.querySelector('#edit-form')

if (btn && form) {
    btn.addEventListener('click', () => {
        form.style.display = "flex"
        btn.style.display = "none"
    })

    form.addEventListener('submit', () => {
        form.style.display = "none"
        btn.style.display = "block"
    })
}