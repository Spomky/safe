<?php

namespace Safe;

/**
 * sybase_close closes the link to a Sybase
 * database that's associated with the specified link
 * link_identifier.
 * 
 * Note that this isn't usually necessary, as non-persistent
 * open links are automatically closed at the end of the script's
 * execution.
 * 
 * sybase_close will not close persistent links
 * generated by sybase_pconnect.
 * 
 * @param resource $link_identifier If the link identifier isn't specified, the last opened link is
 * assumed.
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_close($link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \sybase_close($link_identifier);
    }else {
        $result = \sybase_close();
    }
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
}


/**
 * sybase_data_seek moves the internal row
 * pointer of the Sybase result associated with the specified result
 * identifier to pointer to the specified row number.  The next call
 * to sybase_fetch_row would return that row.
 * 
 * @param resource $result_identifier 
 * @param int $row_number 
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_data_seek($result_identifier, int $row_number): void
{
    error_clear_last();
    $result = \sybase_data_seek($result_identifier, $row_number);
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
}


/**
 * Seeks to the specified field offset.  If the next call to
 * sybase_fetch_field won't include a field
 * offset, this field would be returned.
 * 
 * @param resource $result 
 * @param int $field_offset 
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_field_seek($result, int $field_offset): void
{
    error_clear_last();
    $result = \sybase_field_seek($result, $field_offset);
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
}


/**
 * sybase_free_result only needs to be called
 * if you are worried about using too much memory while your script
 * is running. All result memory will automatically be freed when
 * the script ends. You may call sybase_free_result
 * with the result identifier as an argument and the associated
 * result memory will be freed.
 * 
 * @param resource $result 
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_free_result($result): void
{
    error_clear_last();
    $result = \sybase_free_result($result);
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
}


/**
 * sybase_pconnect acts very much like
 * sybase_connect with two major differences.
 * 
 * First, when connecting, the function would first try to find a
 * (persistent) link that's already open with the same host,
 * username and password.  If one is found, an identifier for it
 * will be returned instead of opening a new connection.
 * 
 * Second, the connection to the SQL server will not be closed when
 * the execution of the script ends.  Instead, the link will remain
 * open for future use (sybase_close will not
 * close links established by sybase_pconnect).
 * 
 * This type of links is therefore called 'persistent'.
 * 
 * @param string $servername The servername argument has to be a valid servername that is defined
 * in the 'interfaces' file.
 * @param string $username Sybase user name
 * @param string $password Password associated with username.
 * @param string $charset Specifies the charset for the connection
 * @param string $appname Specifies an appname for the Sybase connection.
 * This allow you to make separate connections in the same script to the
 * same database. This may come handy when you have started a transaction
 * in your current connection, and you need to be able to do a separate
 * query which cannot be performed inside this transaction.
 * @return resource Returns a positive Sybase persistent link identifier on success, .
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_pconnect(string $servername, string $username, string $password, string $charset, string $appname)
{
    error_clear_last();
    if ($appname !== null) {
        $result = \sybase_pconnect($servername, $username, $password, $charset, $appname);
    } elseif ($charset !== null) {
        $result = \sybase_pconnect($servername, $username, $password, $charset);
    } elseif ($password !== null) {
        $result = \sybase_pconnect($servername, $username, $password);
    } elseif ($username !== null) {
        $result = \sybase_pconnect($servername, $username);
    } elseif ($servername !== null) {
        $result = \sybase_pconnect($servername);
    }else {
        $result = \sybase_pconnect();
    }
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
    return $result;
}


/**
 * sybase_query sends a query to the currently
 * active database on the server that's associated with the specified
 * link identifier.
 * 
 * @param string $query 
 * @param resource $link_identifier If the link identifier isn't specified, the last opened link is
 * assumed. If no link is open, the function tries to establish a link as
 * if sybase_connect was called, and use it.
 * @return mixed Returns a positive Sybase result identifier on success, FALSE on error,
 * or TRUE if the query was successful but didn't return any columns.
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_query(string $query, $link_identifier)
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \sybase_query($query, $link_identifier);
    }else {
        $result = \sybase_query($query);
    }
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
    return $result;
}


/**
 * sybase_select_db sets the current active
 * database on the server that's associated with the specified link
 * identifier.
 * 
 * Every subsequent call to sybase_query will be
 * made on the active database.
 * 
 * @param string $database_name 
 * @param resource $link_identifier If no link identifier is specified, the last opened link is assumed.
 * If no link is open, the function will try to establish a link as if
 * sybase_connect was called, and use it.
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_select_db(string $database_name, $link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \sybase_select_db($database_name, $link_identifier);
    }else {
        $result = \sybase_select_db($database_name);
    }
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
}


/**
 * sybase_set_message_handler sets a user function to
 * handle messages generated by the server. You may specify the name of a
 * global function, or use an array to specify an object reference and a
 * method name.
 * 
 * @param callable $handler The handler expects five arguments in the following order: message
 * number, severity, state, line number and description.  The first four
 * are integers. The last is a string. If the function returns FALSE,
 * PHP generates an ordinary error message.
 * @param resource $link_identifier If the link identifier isn't specified, the last opened link is assumed.
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_set_message_handler(callable $handler, $link_identifier): void
{
    error_clear_last();
    if ($link_identifier !== null) {
        $result = \sybase_set_message_handler($handler, $link_identifier);
    }else {
        $result = \sybase_set_message_handler($handler);
    }
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
}


/**
 * sybase_unbuffered_query sends a query to the
 * currently active database on the server that's associated with the specified
 * link identifier.  If the link identifier isn't specified, the last
 * opened link is assumed.  If no link is open, the function tries to
 * establish a link as if sybase_connect was
 * called, and use it.
 * 
 * Unlike sybase_query,
 * sybase_unbuffered_query reads only the first
 * row of the result set. sybase_fetch_array and similar
 * function read more rows as needed.  sybase_data_seek
 * reads up to the target row.  The behavior may produce better performance
 * for large result sets.
 * 
 * sybase_num_rows will only return the correct number
 * of rows if all result sets have been read. To Sybase, the number of rows
 * is not known and is therefore computed by the client implementation.
 * 
 * @param string $query 
 * @param resource $link_identifier 
 * @param bool $store_result The optional store_result can be FALSE to
 * indicate the resultsets shouldn't be fetched into memory, thus
 * minimizing memory usage which is particularly interesting with very
 * large resultsets.
 * @return resource Returns a positive Sybase result identifier on success, .
 * @throws Exceptions\SybaseException
 * 
 */
function sybase_unbuffered_query(string $query, $link_identifier, bool $store_result)
{
    error_clear_last();
    if ($store_result !== null) {
        $result = \sybase_unbuffered_query($query, $link_identifier, $store_result);
    }else {
        $result = \sybase_unbuffered_query($query, $link_identifier);
    }
    if ($result === FALSE) {
        throw Exceptions\SybaseException::createFromPhpError();
    }
    return $result;
}


