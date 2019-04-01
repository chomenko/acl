<?php
/**
 * Author: Mykola Chomenko
 * Email: mykola.chomenko@dipcom.cz
 */

namespace Chomenko\ACL;

use Chomenko\ACL\Annotations\Accessor;
use Chomenko\ACL\Exceptions\AccessDenied;
use Nette\Application\Request;
use Nette\Application\UI\Component;

class Signal
{

	/**
	 * @var Accessor
	 */
	private $accessor;

	/**
	 * @var Signal|null
	 */
	private $parent;

	/**
	 * @var Request
	 */
	private $request;

	/**
	 * @var Component
	 */
	private $component;

	/**
	 * @param Component $control
	 * @param Accessor $accessor
	 */
	public function __construct(Component $control, Accessor $accessor)
	{
		$this->component = $control;
		$this->accessor = $accessor;
	}

	/**
	 * @return Accessor
	 */
	public function getAccessor(): Accessor
	{
		return $this->accessor;
	}

	/**
	 * @return Signal|null
	 */
	public function getParent(): ?Signal
	{
		return $this->parent;
	}

	/**
	 * @param Signal|null $signal
	 */
	public function setParent(Signal $signal = NULL): void
	{
		$this->parent = $signal;
	}

	/**
	 * @return Request
	 */
	public function getRequest(): Request
	{
		return $this->request;
	}

	/**
	 * @param Request $request
	 */
	public function setRequest($request): void
	{
		$this->request = $request;
	}

	/**
	 * @return Component
	 */
	public function getComponent(): Component
	{
		return $this->component;
	}

	/**
	 * @param string $message
	 * @throws AccessDenied
	 */
	private function accessDenied(string $message = "Access Denied")
	{
		throw new AccessDenied($this, $message);
	}

}