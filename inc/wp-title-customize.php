<?php
// Title Separator
add_filter ('document_title_separator', 'wpse_set_document_title_separator') ;

function wpse_set_document_title_separator ($sep)
{
    return ('|') ;
}