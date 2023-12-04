const btn = document.querySelector('#add-btn')
const form = document.querySelector('#add-form')

if (btn && form) {
    btn.addEventListener('click', () => {
        btn.style.display = 'none'
        form.style.display = 'flex'
    })

    form.addEventListener('submit', (e) => {
        btn.style.display = 'block'
        form.style.display = 'none'
    })

}