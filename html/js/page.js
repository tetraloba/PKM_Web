function print_content(){
    let text_area = document.getElementById('text_area');
    for (line of text_area.children) {
        console.log(line.textContent);
    }
    // console.log(text_area.textContent);
}

window.onload = print_content; // debug

function post_content(){
    const form = document.createElement('form');
    form.action = '';

    /* text_areaの文章を$_POST['lines[]']に詰める */
    let text_area = document.getElementById('text_area');
    let index = 0;
    for (line of text_area.children) {
        const data = document.createElement('input');
        data.value = encodeURIComponent(line.textContent.replace("\n", '') + "\n");
        data.name = 'lines[' + index + ']';
        form.appendChild(data);
        index++;
    }

    /* Fetch API で バックグラウンドで POSTする */
    const formData = new FormData(form);
    const action = form.getAttribute("action");
    const options = {
        method: 'POST',
        body: formData,
    }
    fetch(action, options).then((e) => {
        if (e.status === 200) {
            console.log('saved');
            // ページをリロードする？
        } else {
            console.log('fail to save');
        }
    })
}

function create_content(){
    const date = new Date();
    const page_path = date.toISOString().replaceAll('-', '').replaceAll('T', '').replaceAll(':', '').substring(0,14) + '.txt'; // 日時.txt
    const form = document.createElement('form');
    form.action = './page.php?page=' + page_path; // /page.php?=日付.txt
    form.method = 'post';

    document.body.appendChild(form);
    form.submit();
}
