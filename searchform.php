
            <form id="custom-search-form" class="form-search form-horizontal pull-right" method="get" action="<?php echo home_url('/'); ?>">
                <div class="input-append span12">
                    <input type="text" class="search-query" placeholder="Buscar " name="s"  value="<?php the_search_query(); ?>">
                    <button type="submit" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
</svg></button>
                </div>
            </form>

<style>
    #custom-search-form {
        margin:0;
        margin-top: 5px;
        padding: 0;
    }
 
    #custom-search-form .search-query {
         /* IE7-8 doesn't have border-radius, so don't indent the padding */
        padding-right: 30px;
        padding-right: 31px \9;
        padding-left: 15px;
        padding-left: 16px \9;
        margin-bottom: 0;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        padding-top: 5px;
        padding-bottom: 3px;
    }
 
    #custom-search-form button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 0px;
        margin-top: 5px;
        position: relative;
        left: -30px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }

    #custom-search-form ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: grey;
        opacity: 0.8; /* Firefox */
    }

    #custom-search-form   :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color: grey;
        opacity: 0.8; /* Firefox */
    }

    #custom-search-form    ::-ms-input-placeholder { /* Microsoft Edge */
        color: grey;
        opacity: 0.8; /* Firefox */
    }

</style>