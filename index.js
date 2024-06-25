document.addEventListener('DOMContentLoaded', () => {
    const addNoteButton = document.getElementById('add-note');
    const noteForm = document.getElementById('note-form');
    const saveNoteButton = document.getElementById('save-note');
    const taskList = document.getElementById('task-list');

    // Mostrar el formulario de añadir nota
    addNoteButton.addEventListener('click', () => {
        noteForm.style.display = 'flex';
    });

    // Guardar la nota
    saveNoteButton.addEventListener('click', () => {
        const noteTitle = document.getElementById('note-title').value;
        if (noteTitle.trim() !== '') {
            addNoteToList(noteTitle);
            document.getElementById('note-title').value = '';
            noteForm.style.display = 'none';
        }
    });

    // Añadir nota a la lista
    function addNoteToList(noteTitle) {
        const listItem = document.createElement('li');
        listItem.classList.add('not-completed');

        listItem.innerHTML = `
            <div class="task-title">
                <i class='bx bx-x-circle'></i>
                <p>${noteTitle}</p>
            </div>
            <i class='bx bx-dots-vertical-rounded'></i>
        `;

        // Marcar como completado/no completado
        listItem.querySelector('.task-title i').addEventListener('click', () => {
            listItem.classList.toggle('completed');
            listItem.classList.toggle('not-completed');
            if (listItem.classList.contains('completed')) {
                listItem.querySelector('.task-title i').classList.replace('bx-x-circle', 'bx-check-circle');
            } else {
                listItem.querySelector('.task-title i').classList.replace('bx-check-circle', 'bx-x-circle');
            }
        });

        // Eliminar nota
        listItem.querySelector('.bx-dots-vertical-rounded').addEventListener('click', () => {
            listItem.remove();
        });

        taskList.appendChild(listItem);
    }
});

const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("list-container");

function addTask(){
    if (inputBox.value === ''){
        alert ("Debes escribir algo!");
    }
    else{
        let li = document.createElement("li");
        li.innerHTML = inputBox.value;
        listContainer.appendChild(li);
        let span = document.createElement("span");
        span.innerHTML = "\u00d7";
        li.appendChild(span);
    }
    inputBox.value = "";
    saveData();
}

listContainer.addEventListener("click", function(e){
    if(e.target.tagName === "LI"){
        e.target.classList.toggle("checked");
        saveData();
    }
    else if(e.target.tagName === "SPAN"){
        e.target.parentElement.remove();
        saveData();
    }
}, false);

function saveData(){
    localStorage.setItem("data" , listContainer.innerHTML);
}
function showTask(){
    listContainer.innerHTML = localStorage.getItem("data");
}
showTask();