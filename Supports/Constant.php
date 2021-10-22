<?php


namespace Modules\Backend\Supports;

/**
 * Class Constant
 * @package Modules\Backend\Supports
 */
class Constant
{

    /**
     * System Model Status
     */
    const ENABLED_OPTIONS = ['yes' => 'Yes', 'no' => 'No'];

    /**
     * System User Permission Guards
     */
    const PERMISSION_GUARDS = ['web' => 'WEB'];

    /**
     * System Permission Title Constraint
     */
    const PERMISSION_NAME_ALLOW_CHAR = '([a-zA-Z0-9.-_]+)';

    /**
     * Keyword to purge Soft Deleted Models
     */
    const PURGE_MODEL_QSA = 'purge';

    /**
     *--------------------------------------------------------------------------
     * Timing Constants
     *--------------------------------------------------------------------------
     *
     * Provide simple ways to work with the myriad of PHP functions that
     * require information to be in seconds.
     */
    const SECOND = '1';
    const MINUTE = '60';
    const HOUR = '3600';
    const DAY = '86400';
    const WEEK = '604800';
    const MONTH = '2592000';
    const YEAR = '31536000';
    const DECADE = '315360000';

    /**
     * --------------------------------------------------------------------------
     * Exit Status Codes
     * --------------------------------------------------------------------------
     *
     * Used to indicate the conditions under which the script is exit()ing.
     * While there is no universal standard for error codes, there are some
     * broad conventions.  Three such conventions are mentioned below, for
     * those who wish to make use of them.  The CodeIgniter defaults were
     * chosen for the least overlap with these conventions, while still
     * leaving room for others to be defined in future versions and user
     * applications.
     *
     * The three main conventions used for determining exit status codes
     * are as follows:
     *
     *    Standard C/C++ Library (stdlibc):
     *       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
     *       (This link also contains other GNU-specific conventions)
     *    BSD sysexits.h:
     *       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
     *    Bash scripting:
     *       http://tldp.org/LDP/abs/html/exitcodes.html
     *
     */
    const EXIT_SUCCESS = '0'; // no errors
    const EXIT_ERROR = '1'; // generic error
    const EXIT_CONFIG = '3'; // configuration error
    const EXIT_UNKNOWN_FILE = '4'; // file not found
    const EXIT_UNKNOWN_CLASS = '5'; // unknown class
    const EXIT_UNKNOWN_METHOD = '6'; // unknown class member
    const EXIT_USER_INPUT = '7'; // invalid user input
    const EXIT_DATABASE = '8'; // database error
    const EXIT__AUTO_MIN = '9'; // lowest automatically-assigned error code
    const EXIT__AUTO_MAX = '125'; // highest automatically-assigned error code

    /**
     * Toastr Message Levels
     */
    const MSG_TOASTR_ERROR = 'error';
    const MSG_TOASTR_WARNING = 'warning';
    const MSG_TOASTR_SUCCESS = 'success';
    const MSG_TOASTR_INFO = 'info';

}
