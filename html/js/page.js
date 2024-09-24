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
        data.value = line.textContent + '\r\n';
        data.name = 'lines[' + index + ']';
        form.appendChild(data);
        index++;
    }

    /* debug */
    let debug_data1 = document.createElement('input');
    debug_data1.value = '1行目の文字列です';
    debug_data1.name = 'debug_lines[0]';
    form.appendChild(debug_data1);
    let debug_data2 = document.createElement('input');
    debug_data2.value = '2行目の文字列です';
    debug_data2.name = 'debug_lines[1]';
    form.appendChild(debug_data2);
    let debug_data3 = document.createElement('input');
    debug_data3.value = '3行目の文字列です';
    debug_data3.name = 'debug_lines[2]';
    form.appendChild(debug_data3);

    document.body.appendChild(form); // documentに紐づけないとエラーが出る "Form submission canceled because the form is not connected"

    form.submit();
}
