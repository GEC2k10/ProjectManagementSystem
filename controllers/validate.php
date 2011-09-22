<script language="php">
function ValidateEmail($email)   // Validates an Email 
{
    if(ereg("^.+@.+\\..+$",$email)) // using regular expressions 
        return true;
    else
        return false;
}

function ValidateInput(&$input)   // removes scripting tags from input
{
    ereg_replace("^< .+ >$","",$input); // regex used again
}
</script>

