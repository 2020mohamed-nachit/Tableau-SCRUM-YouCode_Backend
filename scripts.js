function validation()
{
    if (document.getElementById('task-title').value.trim() == "")
    {
        event.preventDefault();
        alert( "Please provide your Title!" );
        return false;
    }
    else if (document.getElementById('task-priority').value == "")
    {
        event.preventDefault();
        alert( "Please provide your priority!" );
        return false;
    }
    else if (document.getElementById('task-status').value == "")
    {
        event.preventDefault();
        alert( "Please provide your status!" );
        return false;
    }
    else if (document.getElementById('task-date').value == "")
    {
        event.preventDefault();
        alert( "Please provide your date!" );
        return false;
    }
    else if (document.getElementById('task-description').value.trim() == "")
    {
        event.preventDefault();
        alert( "Please provide your description!" );
        return false;
    }
    else {
        document.getElementById('form-task').submit();
    }
}