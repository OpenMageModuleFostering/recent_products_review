/**
* Setubridge Technolabs
* http://www.setubridge.com/
* @author SetuBridge
* @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
**/
function sbclose(group1)
{
    if($(group1).hasClassName('sbfull'))
    {
        $(group1).hide();
        $(group1).previous().show();
    }
}
function sbreadmore(group) 
{
    if($(group).hasClassName('open'))
    {
        $(group).parentNode.hide();
        var ne = $(group).parentNode.next()
        ne.show();
    }
}