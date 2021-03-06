<?php
/**
 * Copyright 2013 Bernd Hoffmann <info@gebeat.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Bigpoint;

class SessionPersistence implements PersistenceInterface
{
    /**
     * @var SessionAdapter
     */
    private $sessionAdapter;

    /**
     * @param SessionAdapter $sessionAdapter
     */
    public function __construct(
        SessionAdapter $sessionAdapter
    ) {
        $this->sessionAdapter = $sessionAdapter;

        $this->initSession();
    }

    /**
     * Start new or resume existing session.
     */
    private function initSession()
    {
        $sessionId = $this->sessionAdapter->id();

        if (true === empty($sessionId)) {
            $this->sessionAdapter->start();
        }
    }

    /**
     * (non-PHPdoc)
     * @see PersistenceInterface::set()
     */
    public function set($key, $value)
    {
        $this->sessionAdapter->set($key, $value);
    }

    /**
     * (non-PHPdoc)
     * @see PersistenceInterface::get()
     */
    public function get($key, $default = null)
    {
        return $this->sessionAdapter->get($key, $default);
    }

    /**
     * (non-PHPdoc)
     * @see PersistenceInterface::delete()
     */
    public function delete($key)
    {
        $this->sessionAdapter->delete($key);
    }

    /**
     * (non-PHPdoc)
     * @see PersistenceInterface::flush()
     */
    public function flush()
    {
        $this->sessionAdapter->flush();
    }
}
