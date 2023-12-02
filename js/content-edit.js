const btn = document.querySelector('#edit-btn')
const zone = document.querySelector('#edit-zone')

if (btn && zone) {
    btn.addEventListener('click', () => {
        const tmpHTML = zone.innerHTML
        const textarea = document.createElement("textarea");
        textarea.cols = 100
        textarea.rows = 35
        textarea.style.resize = 'none'
        textarea.value = tmpHTML;
        zone.innerHTML = ''
        zone.appendChild(textarea);

        const saveBtn = document.createElement("button");
        const cancelBtn =  document.createElement("button");

        saveBtn.innerText = 'Сохранить'
        cancelBtn.innerText = 'Отменить'

        cancelBtn.addEventListener('click', () => {
            zone.innerHTML = tmpHTML
            saveBtn.remove()
            cancelBtn.remove()
            btn.style.display = 'inline'
        })

        saveBtn.addEventListener('click', () => {
            zone.innerHTML = textarea.value
            saveBtn.remove()
            cancelBtn.remove()
            console.log(textarea.value)
            btn.style.display = 'inline'
            fetch('../php/edit_html.php', {
                method: 'POST',
                body: JSON.stringify({ content: textarea.value, name: zone.dataset.name }),
            })
        })

        zone.after(saveBtn)
        zone.after(cancelBtn)

        btn.style.display = 'none'
    })
}