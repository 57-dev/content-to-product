/*
Author: dump501
admin_ui.ctp.js (c) 2021
Desc: manage admin user interface
*/
window.addEventListener("load", function () {

    //global 
    const ctpBody = document.querySelector('.ctp_body');
    const ctpGeneralSettingsBtn = document.querySelector('#general_settings');
    const ctpHelpSuppportBtn = document.querySelector('#help_support');

    const ctpGeneralSettingsContent = document.querySelector('#general_settings_content');
    const ctpHelpSuppportContent = document.querySelector('#help_support_content');

    console.log(ctpHelpSuppportContent)
    const ctpSettingContent = [
        ctpGeneralSettingsContent,
        ctpHelpSuppportContent
    ];

    const ctpSettingBtn = [
        ctpGeneralSettingsBtn,
        ctpHelpSuppportBtn
    ];

    if (document.querySelector(localStorage['active_item']) !== null) {
        hideContents();
        document.querySelector(localStorage['active_item']).classList.add("active");
        if (document.querySelector(localStorage['active_item'] + '_content') !== null) {
            document.querySelector(localStorage['active_item'] + '_content').style.display = "block";
        }
        ctpBody.classList.remove('d-none')
    } else {
        ctpBody.classList.remove('d-none')
        hideContents();
        localStorage['active_item'] = '#' + ctpGeneralSettingsBtn.id
        ctpGeneralSettingsBtn.classList.add("active");
        ctpGeneralSettingsContent.style.display = "block";

    }


    //event listeners
    if (ctpGeneralSettingsBtn !== null) { ctpGeneralSettingsBtn.addEventListener('click', handleGeneralSettings) }
    if (ctpHelpSuppportBtn !== null) { ctpHelpSuppportBtn.addEventListener('click', handleHelpSupport) }


    //functions
    /**
     * insert after function
     */
    function insertAfter(newNode, referenceNode) {
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }

    /**
     * reset all the settings content to disply none
     */
    function hideContents() {

        for (let content of ctpSettingContent) {
            if (content !== null) {
                content.style.display = "none";
            }
        }

        for (const btn of ctpSettingBtn) {
            if (btn !== null) {
                btn.classList.remove("active");
            }
        }

    }

    /**
     * handles the click on general settings button
     * 
     * @param {*} e 
     */
    function handleGeneralSettings(e) {
        e.preventDefault();
        hideContents();
        localStorage['active_item'] = '#' + ctpGeneralSettingsBtn.id
        ctpGeneralSettingsBtn.classList.add("active");
        ctpGeneralSettingsContent.style.display = "block";

    }

    /**
     * handles the click on help and support button
     * 
     * @param {*} e 
     */
    function handleHelpSupport(e) {
        e.preventDefault();
        hideContents();
        localStorage['active_item'] = '#' + ctpHelpSuppportBtn.id
        ctpHelpSuppportBtn.classList.add("active");
        ctpHelpSuppportContent.style.display = "block";
    }

})
