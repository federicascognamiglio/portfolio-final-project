document.addEventListener('DOMContentLoaded', function () {
    const addTagBtn = document.getElementById('add-tag-btn');
    const tagInput = document.getElementById('new-tag-name');
    const tagList = document.getElementById('tag-list');

    console.log('Script caricato!');
    console.log('Bottone:', addTagBtn);

    if (!addTagBtn || !tagInput || !tagList) {
        console.warn('Uno degli elementi non è stato trovato nel DOM');
        return;
    }

        addTagBtn.addEventListener('click', function (event) {
            event.preventDefault();

            addTagBtn.addEventListener('click', function () {
                const tagName = tagInput.value.trim();
        
                if (!tagName) return;

                axios.post('/tags', {
                    name: tagName
                })
                .then(response => {
                    const tag = response.data;
                    let html = `<label><input type="checkbox" name="tags[]" value="${tag.id}" checked> ${tag.name}</label><br>`;
                    tagList.insertAdjacentHTML('beforeend', html);
                    tagInput.value = '';
                })
                .catch(error => {
                    console.error(error);
                    alert("Errore durante la creazione del tag");
                });
            });
    })
});