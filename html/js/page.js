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

    document.body.appendChild(form); // documentに紐づけないとエラーが出る "Form submission canceled because the form is not connected"

    form.submit();
}
