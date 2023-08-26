function createtodo(){
    const todo = document.createElement('div');
    todo.classList.add('todo');

    //The width size to which the todo falls should be between 100width
    todo.style.left = Math.random() * 100 + 'vw';

    //The animationDuration should be b/w 2-5 secs, some will fall faster than others.
    todo.style.animationDuration = Math.random() * 2 + 3 + 's';

    todo.innerHTML = '📝';
    document.body.appendChild(todo);

    //Removes the todos at the top edges after 5 secs so we barely see any there
    setTimeout(() => {
        todo.remove();
    }, 5000);
}
setInterval(createtodo, 300);
