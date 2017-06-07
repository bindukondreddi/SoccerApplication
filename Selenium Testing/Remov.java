package soccer;

import java.io.File;
import java.io.IOException;
import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.apache.commons.io.FileUtils;
import org.openqa.selenium.OutputType;
import org.openqa.selenium.TakesScreenshot;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

public class Remov {

	public static void main(String[] args) throws IOException {
		// TODO Auto-generated method stub

		
		
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\kiran\\Desktop\\Selenium\\servers\\chromedriver.exe");
		WebDriver driver=new ChromeDriver();
		driver.get("http://localhost/soccer/");
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
		
		driver.findElement(By.xpath(".//*[@id='header']/div[2]/div/div/div[2]/div/ul/li[2]/a")).click();
		driver.findElement(By.xpath(".//*[@id='login_input_username']")).sendKeys("sindu");
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
		driver.findElement(By.xpath(".//*[@id='login_input_password']")).sendKeys("sindu11");
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[1]/div/form/button")).click();
		
		driver.findElement(By.xpath(".//*[@id='slider-carousel']/a[2]/i")).click();
		
		
		WebDriverWait w1= new WebDriverWait(driver,20);
		w1.until(ExpectedConditions.visibilityOfElementLocated(By.xpath(".//*[@id='header']/div[2]/div/div/div[1]/div[1]/a/img")));
		driver.findElement(By.xpath(".//*[@id='header']/div[2]/div/div/div[1]/div[1]/a/img")).click();
			
			
		driver.findElement(By.cssSelector(".item_add.btn.btn-default")).click();
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
		System.out.println(driver.switchTo().alert().getText());
		driver.switchTo().alert().accept();
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
		driver.findElement(By.xpath("html/body/section[2]/div/div/div[2]/div[1]/div[2]/div/div/div/div/p/a")).click();
		driver.findElement(By.cssSelector(".item_add.btn.btn-fefault.cart")).click();
		driver.manage().timeouts().implicitlyWait(50, TimeUnit.SECONDS);
		System.out.println(driver.switchTo().alert().getText());
		driver.switchTo().alert().accept();  
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);	    
		driver.findElement(By.xpath(".//*[@id='header']/div[2]/div/div/div[2]/div/ul/li[1]/a")).click();
		
		File srcFile=((TakesScreenshot)driver).getScreenshotAs(OutputType.FILE);
		FileUtils.copyFile(srcFile, new File("C:\\Users\\kiran\\Desktop\\cart.png"));
		
		driver.manage().timeouts().implicitlyWait(70, TimeUnit.SECONDS);	
		driver.findElement(By.cssSelector(".simpleCart_remove")).click();
		driver.manage().timeouts().implicitlyWait(70, TimeUnit.SECONDS);	
		driver.findElement(By.xpath(".//*[@id='header']/div[2]/div/div/div[2]/div/ul/li[3]/a")).click();
				
	}

}
