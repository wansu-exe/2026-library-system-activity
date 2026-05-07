<?php declare(strict_types=1); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Report</title>
</head>
<body>
    <div class="report-container">
        <h1>Library Report</h1>
        
        <div class="report-item">
            <span class="report-label">Total Books:</span>
            <span class="report-value"><?= htmlspecialchars((string) $report['totalBooks']) ?></span>
        </div>
        
        <div class="report-item">
            <span class="report-label">Currently Borrowed:</span>
            <span class="report-value"><?= htmlspecialchars((string) $report['totalBorrowed']) ?></span>
        </div>
        
        <div class="report-item">
            <span class="report-label">Total Returned:</span>
            <span class="report-value"><?= htmlspecialchars((string) $report['totalReturned']) ?></span>
        </div>
        
        <div class="report-item">
            <span class="report-label">Total Fines Collected:</span>
            <span class="report-value">$<?= htmlspecialchars(number_format($report['totalFines'], 2)) ?></span>
        </div>
    </div>
</body>
</html>