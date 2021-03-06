<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrLightspeedRetail\Exception;

use Exception;

/**
 * @author Daniel Gimenes
 */
class UnauthorizedException extends RuntimeException
{
    /**
     * @param string $authorizationCode
     *
     * @return UnauthorizedException
     */
    public static function authorizationCodeRejected(string $authorizationCode): self
    {
        return new self(sprintf(
            'Authorization code "%s" was rejected by Lightspeed Authorization Server.',
            $authorizationCode
        ));
    }

    /**
     * @return UnauthorizedException
     */
    public static function missingReferenceId(): self
    {
        return new self(
            'Missing "referenceID" command param.'
            . ' This is required to fetch the credentials from credential storage'
        );
    }

    /**
     * @param string $referenceID
     *
     * @return UnauthorizedException
     */
    public static function missingCredential(string $referenceID): self
    {
        return new self(sprintf(
            'No credential found in credential storage for "%s".',
            $referenceID
        ));
    }

    /**
     * @param string         $refreshToken
     * @param Exception|null $exception
     *
     * @return UnauthorizedException
     */
    public static function refreshTokenRejected(string $refreshToken, Exception $exception = null): self
    {
        return new self(sprintf(
            'The refresh token "%s" was rejected by Lightspeed Authorization Server',
            $refreshToken
        ), 0, $exception);
    }
}
