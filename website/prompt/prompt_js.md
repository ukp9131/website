# Create JavaScript code.
## Prompt
- Send the ID and password values through an AJAX request to ```_login.php```, and if a success response is received, redirect to the ```check_list.php``` page.
## Input
### HTML
```html
```
## Rule
- Create the code with reference to the ```## example``` section below.
- You can Only access HTML tag. Examples is in below.
1. Have the class with ```ukpj__``` prefix that variable name is ```ukpj__{The class name of the top-level tag}_{variable name}```
2. Have the name attribute in ```form``` tag with ```ukpj__``` prefix class. Variable name is ```name``` attribute value and variable value is ```value``` attribute value.
- Use the functions listed under the ```## functions``` section first.
- The REST API list is under the ```## REST API``` section.
## REST API
- All REST API requests return responses in JSON format.
- url: _login.php
  request
  id: ID
  pw: Password
  response
  code: A value of 1 means success; any other value means failure.
  msg: Contains detailed descriptions of the ```code``` variable.
  token: Unique string for identity user.
- url: _logout.php
  request
  token: Unique string for identity user.
  response
  code: A value of 1 means success; any other value means failure.
  msg: Contains detailed descriptions of the ```code``` variable.
## Functions
```js
/**
 * - Send data through an AJAX request to the specified URL.
 * - Content-Type: multipart/form-data
 * 
 * @param {string}        url        The target URL.
 * @param {object|string} data       A FormData object, a form tag selector, or a JSON object.
 * @param {function}      com_func   A callback function that receives the response content as its first parameter.
 * @param {function}      pro_func   (Optional) A progress callback function that receives the upload progress percentage as its first parameter.
 */
ukp.ajax(url, data, com_func, pro_func = null);

/**
 * - Find an element using a query selector.
 * 
 * @param   {string} selector  The query selector string.
 * @returns {HTMLElement}      The matched HTML element.
 */
ukp.find(selector) {
    const ukp = this;
    return ukp.root.querySelector(selector);
}

/**
 * - Attach an event listener to a target element.
 * 
 * @param {string}        event_name  The event name (e.g., "click", "submit").
 * @param {object|string} target      The target element or a query selector string.
 * @param {function}      fun         The event handler function, which receives the event object as an argument.
 */
ukp.on(event_name, target, fun);

/**
 * - Execute a function after the DOM content has fully loaded.
 * 
 * @param {function} fun  The callback function to run when the DOM is ready.
 */
ukp.ready(fun);
```
## Example
```JS
import Ukp from '_.js';
var ukp = new Ukp();
//Code in here
```