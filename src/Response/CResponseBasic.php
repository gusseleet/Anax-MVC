<?php

namespace Anax\Response;

/**
 * Handling a response.
 *
 */
class CResponseBasic
{
    use \Anax\DI\TInjectionAware;


    /**
    * Properties
    *
    */
    private $headers; // Set all headers to send



    /**
     * Set headers.
     *
     * @param string $header type of header to set
     *
     * @return $this
     */
    public function setHeader($header)
    {
        $this->headers[] = $header;
    }



    //Mail till MOS - akronym, validerar inte korrekt.
    /**
     * Check if headers are already sent and throw exception if it is.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function checkIfHeadersAlreadySent()
    {
        if (headers_sent($file, $line)) {
            $msg = "Trying to send headers but headers already sent, output started at $file line $line.";
            throw new \Exception($msg);
        }
    }



    /**
     * Send headers.
     *
     * @return $this
     */
    public function sendHeaders()
    {
        if (empty($this->headers)) {
            return;
        }

        $this->checkIfHeadersAlreadySent();

        foreach ($this->headers as $header) {
            switch ($header) {
                case '403':
                    header('HTTP/1.0 403 Forbidden');
                    break;

                case '404':
                    header('HTTP/1.0 404 Not Found');
                    break;

                case '500':
                    header('HTTP/1.0 500 Internal Server Error');
                    break;

                default:
                    throw new \Exception("Trying to sen unkown header type: '$header'.");
            }
        }

        return $this;
    }



    /**
     * Redirect to another page.
     *
     * @param string $url to redirect to
     *
     * @return void
     */
    public function redirect($url)
    {
        $this->checkIfHeadersAlreadySent();
<<<<<<< HEAD

        $url = $this->di->get("url")->create($url);

=======
        $url = $this->di->get("url")->create($url);
>>>>>>> 31c25be9dd34963f69e5d234c9612af224724526
        header('Location: ' . $url);
        exit();
    }
}
