import { saludar } from './js/componentes';


import './styles.css';

const nombre = 'Xenia';

saludar( nombre );



import head from "./_common/html/head.html";
let hed = document.createElement('div');
hed.innerHTML=head;
document.body.append(hed);

import header from "./_common/html/header.html";
let heder = document.createElement('div');
heder.innerHTML=header;
document.body.append(heder);

import footer from "./_common/html/footer.html";
let div = document.createElement('div');
div.innerHTML=footer;
document.body.append(div);

