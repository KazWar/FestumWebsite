if (typeof $ == "function") {
    $(document).ready(function () {
        var containers = $('.thumbnail-container', '.product-list');

        containers.on('mouseover', function () {
            var img = $('.thumbnail-image', this);
            $(this).css('height', img.height() + 'px');
        });

        containers.on('mouseout', function () {
            $(this).css('height', '150px');
        });
    });
}

function openLoginForm() {
    document.getElementById("PopUpOverlay").style.display = "block";
    document.getElementById("loginPopUp").style.display = "block";
}

function closeLoginForm() {
    document.getElementById("PopUpOverlay").style.display = "none";
    document.getElementById("loginPopUp").style.display = "none";
}


/* Replaces all occurrences of a string within another string */
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};


/* Returns URL query parameter with the specified name,
   or the optional default value if no parameter is present */
function getQueryParameter(name, defaultValue) {
    let result = defaultValue;
    let url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (results && results[2])
        result = decodeURIComponent(results[2].replace(/\+/g, " "));
    return result;
}


/* Populates the specified HTML component with data.
   The component can be specified as CSS selector or
   just a ready to use HTML element */
function PopulateComponent(componentOrSelector, data) {
    let component = componentOrSelector;
    if (typeof componentOrSelector == "string")
        component = document.querySelector(componentOrSelector);
    if (component && data) {
        // Inject all properties from data as local variables,
        // so that string interpolation engine can pick them
        for (let key of Object.keys(data)) {
            this[key] = data[key];
        }

        // Get component HTML inner content
        let content = component.getAttribute("template-content")
        if (!content) {
            // If component populated first time, store the original HTML for future uses
            content = component.innerHTML;       
            component.setAttribute("template-content", component.innerHTML)
        }
 
        // Parse expressions in the content
        let parser = new Function("return `" + content + "`;");
        content = parser.call(data);

        // Replace component content
        component.innerHTML = content;
    }
    return component;
}


/* Creates HTML component from the specified template and data,
   appends to the specified container. Properties contain the following:

   {
       tag: '',
       template: '',
       className: '',
       ...
       ...
   }

    tag         - specifies the HTML tag used for the newly created component
    template    - HTML markup to use for the component, or alternatively selector
                  to HTML element containing the markup to use
    className   - CSS class to apply to the newly created component
    ...         - other HTML attributes to add to the component
*/
function AddComponent(properties, containerOrSelector, data) {
    // Find container where component should be added
    let container = containerOrSelector;
    if (typeof containerOrSelector == "string")
        container = document.querySelector(containerOrSelector);

        let component = undefined;
    if (properties && properties.tag && properties.template && container && data) {
        // Find component template, specified in properties as raw text or as element selector
        let template = properties.template;
        if (template.indexOf("<") == -1)
            template = document.querySelector(properties.template).innerHTML;

        // Create component, inject the template into it
        component = document.createElement(properties.tag);
        component.innerHTML = template;

        // Set component properties and attributes
        for (let key of Object.keys(properties)) {
            if (key == "className") {
                component.className = properties[key]
            }
            else if (key != "tag" && key != "template") {
                component.setAttribute(key, properties[key]);
            }
        }

        // Inject data into the component
        PopulateComponent(component, data);

        // Add component to the container
        container.appendChild(component);
    }
    return component;
}


/* Creates HTML components from the specified template and data collection,
   appends to the specified container */
function AddComponents(properties, containerOrSelector, data) {
    let components = [];
    if (data && data.length) {
        for (let item of data) {
            let component = AddComponent(properties, containerOrSelector, item);
            components.push(component);
        }
    }
    return components;
}

