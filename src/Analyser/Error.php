<?php declare(strict_types = 1);

namespace PHPStan\Analyser;

class Error
{
    public const SEVERITY_ERROR = 'error';
    public const SEVERITY_WARNING = 'warning';
    public const SEVERITY_INFO = 'info';

	/** @var string */
	private $message;

	/** @var string */
	private $file;

	/** @var int|NULL */
	private $line;

	/** @var bool */
	private $canBeIgnored;

	/** @var string */
    private $category;

    /** @var string  */
    private $type;

    /** @var string  */
    private $severity;

	public function __construct(string $message, string $file, ?int $line = null, bool $canBeIgnored = true)
	{
		$this->message = $message;
		$this->file = $file;
		$this->line = $line;
		$this->canBeIgnored = $canBeIgnored;
	}

	public function getMessage(): string
	{
		return $this->message;
	}

	public function getFile(): string
	{
		return $this->file;
	}

	public function getLine(): ?int
	{
		return $this->line;
	}

	public function canBeIgnored(): bool
	{
		return $this->canBeIgnored;
	}

    public function getSource(): string
    {
        return 'PHPStan.' . $this->getCategory().' . '.$this->getType();
	}

    public function getCategory(): string
    {
        return $this->category ?? 'Uncategorized';
    }

    public function getType(): string
    {
        return $this->type ?? 'Unknown';
    }

    public function getSeverity()
    {
        return $this->severity ?? self::SEVERITY_ERROR;
    }

    public function setSeverity(string $severity)
    {
        $this->severity = $severity;

        return $this;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;

        return $this;
    }

    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }
}
