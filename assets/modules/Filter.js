/**
 * @property {HTMLElement} pagination
 * @property {HTMLElement} content
 * @property {HTMLElement} form
 */
export default class Filter {

    /**
     * @param {HTMLElement|null} element
     */
    constructor (element){
        if (element === null) {
            return
        }
        this.pagination = element.querySelector('.js-filter-page')
        this.content = element.querySelector('.js-filter-content')
        this.form = element.querySelector('.js-filter-form')
        this.bindEvents()
    }

    /**
     * Ajoute les comportements des différents éléments 
     */
    bindEvents () {
        this.pagination.addEventListener('click', event => {
            if (event.target.tagName === 'a') {
                event.preventDefault()
                this.loadUrl(event.target.getAttribute('href'))
            }
        })
        this.form.querySelectorAll('input').forEach(input =>{
            input.addEventListener('change', this.loadForm.bind(this))
        })
    }

    async loadForm () {
        const data = new FormData(this.form)
        const url = new URL(this.form.getAttribute('action') || window.location.href)
        const params = new URLSearchParams()
        data.forEach((value, key) => {
            params.append(key, value)
        })
        return this.loadUrl(url.pathname + '?' + params.toString())
    }
    
    async loadUrl(url) {
        const response = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        if (response.status >= 200 && response.status < 300) {
            const data = await response.json()
            this.content.innerHTML = data.content
            this.pagination.innerHTML = data.pagination
            history.replaceState({}, '', url)
        }else{
            console.error(response)
        }
    }
}