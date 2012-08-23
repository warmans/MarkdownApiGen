MarkdownApiGen
==============

Tool for generating API Documentation in GitHub Markdown format from a PSR-0 Compatible PHP Library.

Generated API docs that look like this:

### Form ###
>    ClosureForm Form. The only component that the user is expected to use directly.
>
>    author : warmans
>
>
>    -----------------
>    <pre>`public` **__construct**( [ $name], [array $attributes] )</pre>
>
>    >
>    >
>    >
>
>    
>    <pre>`public` **isSubmitted**(  )</pre>
>
>    >
>    >    Check if the form has been submitted. This is based on the presence of an auto-generated
>    >    field in the in the relevant superglobal (POST, GET).
>    >    Returns: boolean
>
>
>    <pre>`public` **isValid**(  )</pre>
>
>    >
>    >    Check if validation has passed (and no external errors have been added). Validation is only run once.
>    >    Returns: boolean
>
>
>    <pre>`public` **handleButtonActions**(  )</pre>
>
>    >
>    >    Causes the action given to the submitted button to be triggered.
>    >    Returns: mixed - response of action Closure
>
>
>    <pre>`private` **_getDefaultRowTemplate**(  )</pre>
>
>    >
>    >
>    >
>
>
>    <pre>`public` **getName**(  )</pre>
>
>    >
>    >    Get the name of the form.
>    >    Returns: string
>
>
>    <pre>`public` **getField**( string $name )</pre>
>
>    >    `Param: $name string `
>    >
>    >    Get a field by name. Throws Exception if field is not found.
>    >    Returns: FieldProxy
>
>
>    <pre>`public` **getFields**(  )</pre>
>
>    >
>    >    Get all the fields for the form
>    >    Returns: array
>
>
>    <pre>`public` **getButtons**(  )</pre>
>
>    >
>    >    Get all the buttons for the form
>    >    Returns: array
>
>
>    <pre>`public` **addTextField**( string $name )</pre>
>
>    >    `Param: $name string `
>    >
>    >    Text type field.
>    >    Returns: FieldProxy
>
>
>    <pre>`public` **addHiddenField**( string $name )</pre>
>
>    >    `Param: $name string `
>    >
>    >    Hidden type field. Hidden fields do not render row or error elements either.
>    >    Returns: FieldProxy
>
>
>    <pre>`public` **addPasswordField**( string $name )</pre>
>
>    >    `Param: $name string `
>    >
>    >    Password type field.
>    >    Returns: FieldProxy
>
>
>    <pre>`public` **addCheckboxField**( string $name )</pre>
>
>    >    `Param: $name string `
>    >
>    >    Checkbox type field.
>    >    Returns: FieldProxy
>
>
>    <pre>`public` **addSelectField**( string $name, array $keyVals )</pre>
>
>    >    `Param: $name string `
>    >    `Param: $keyVals array field options`
>    >
>    >    Select field. This method also takes an options array.
>    >    Returns: FieldProxy
>
>
>    <pre>`public` **addInputField**( string $type, string $name )</pre>
>
>    >    `Param: $type string `
>    >    `Param: $name string `
>    >
>    >    Add an field with an arbritrary type.
>    >    Returns: FieldProxy
>
>
>    <pre>`public` **addTextareaField**( string $name )</pre>
>
>    >    `Param: $name string `
>    >
>    >    Textarea type field.
>    >    Returns: FieldProxy
>
>
>    <pre>`protected` **_addField**(  $name, ClosureForm\FieldProxy $field )</pre>
>
>    >
>    >
>    >
>
>
>    <pre>`public` **addButton**( string $name )</pre>
>
>    >    `Param: $name string `
>    >
>    >    Adds a button to the form. A button is similar to a field but can be assigned an action to perform
>    >    if the form is submitted using that button. You must only call handleButtonActions to trigger the relevant
>    >    action.
>    >    Returns: \ClosureForm\Button
>
>
>    <pre>`protected` **_addButton**(  $name, ClosureForm\ButtonProxy $field )</pre>
>
>    >
>    >
>    >
>
>
>    <pre>`public` **addError**( string $errorMsg, [string $affectsField] )</pre>
>
>    >    `Param: $errorMsg string `
>    >    `Param: $affectsField string fieldname of affected field`
>    >
>    >    Add an external error (i.e. not based on internal validation) to the form. If a field is specified the error
>    >    will be appended to that field's error array. Otherwise it'll just display as a generic error.
>    >    Returns: type
>
>
>    <pre>`private` **_addGeneralError**(  $errorMsg )</pre>
>
>    >
>    >
>    >
>
>
>    <pre>`public` **render**(  )</pre>
>
>    >
>    >    Render the entire form including all errors, fields and buttons
>    >    Returns: type
>
>
>    <pre>`public` **getAttributeString**( array $attributes )</pre>
>
>    >    `Param: $attributes array `
>    >
>    >    Convert keyval pairs into an attribute string.
>    >    Returns: string
>
>
>    <pre>`public` **getAttribute**( string $name )</pre>
>
>    >    `Param: $name string `
>    >
>    >    Get the value of a specific form attribute.
>    >    Returns: type
>
>
>    <pre>`public` **setSuperglobalOverride**( array $data )</pre>
>
>    >    `Param: $data array `
>    >
>    >    Override the superglobal specified by the form method e.g. rather than using _POST use $data.
>    >
>
>
>    <pre>`public` **getSuperglobal**(  )</pre>
>
>    >
>    >    Get the POST or GET array depending on the form method attribute.
>    >    Returns: array
>
>
>
