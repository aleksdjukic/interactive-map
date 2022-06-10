import Translator from '@andreasremdt/simple-translator';

let language_set = '';
export function setLanguage(language){
    if (language_set === '') {
        // The option `filesLocation` is "/i18n" by default, but you can
        // override it
        window.translator = new Translator({
            filesLocation: '/i18n',
        });

        // This will fetch "/i18n/bs.json" and "/i18n/en.json"
        translator.fetch(['en', 'bs']).then(() => {

            window.translator.translatePageTo(language);

            language_set = language;
        });
    }
}
export function getLanguage() {
    const newURL =
        window.location.protocol +
        "://" +
        window.location.host +
        "/" +
        window.location.pathname;
    const pathArray = window.location.pathname.split("/");
    let segment_1 = pathArray[1];

    if (segment_1 == '') {
        segment_1 = 'bs';
    }

    return segment_1;
}

window.language_json = [];
window.language_json['bs'] = require('../i18n/bs.json');
window.language_json['en'] = require('../i18n/en.json');
