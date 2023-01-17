import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


// Poupup for the delete button
const deleteBtns = document.querySelectorAll('.delete-btn');
const showDeleteBtn = document.getElementById('show-delete-btn');

deleteBtns.forEach((btn)=>{
    showTheModal(btn);
})


if(showDeleteBtn){
    showTheModal(showDeleteBtn);
}

// Img preview
const fileInput = document.getElementById('cover_path');
const imgPreview = document.getElementById('preview-img');


if(fileInput && imgPreview){
    fileInput.addEventListener('change', function() {
        const uploadedFile = this.files[0];
        if(uploadedFile){
            const reader = new FileReader();
            reader.addEventListener('load', function(){
                imgPreview.src = reader.result;
            })
    
            reader.readAsDataURL(uploadedFile)
        }
    })
}





// Functions
function showTheModal(element){
    element.addEventListener('click', (event)=>{
        event.preventDefault();
        let projectTitle = element.getAttribute('button-name');
        const modal = new bootstrap.Modal(document.getElementById('delete-modal'));
        document.getElementById('modal-title').innerText =  `Sei sicuro di voler eliminare ${projectTitle}?`;
        modal.show();
        document.getElementById('delete').addEventListener('click', ()=>{
            element.parentElement.submit();
        })
    })
}