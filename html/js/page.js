function print_content(){
    let text_area = document.getElementById('text_area');
    for (line of text_area.children) {
        console.log(line.textContent);
    }
    // console.log(text_area.textContent);
}

window.onload = print_content;

function post_content(){
    const form = document.createElement('form');
    form.action = '';
    form.method = 'post';

    let text_area = document.getElementById('text_area');
    let index = 0;
    for (line of text_area.children) {
        const data = document.createElement('input');
        data.value = line.textContent;
        data.name = 'line[' + index + ']';
        form.appendChild(data);
        index++;
    }

    form.submit();
}
