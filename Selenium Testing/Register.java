package soccer;

import java.io.File;
import java.io.IOException;
import java.util.concurrent.TimeUnit;

import org.apache.commons.io.FileUtils;
import org.junit.Assert;
import org.openqa.selenium.By;
import org.openqa.selenium.OutputType;
import org.openqa.selenium.TakesScreenshot;
import org.openqa.selenium.WebDriver;

import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.Select;

public class Register {

	public static void main(String[] args) throws IOException {



		System.setProperty("webdriver.chrome.driver", "C:\\Users\\kiran\\Desktop\\Selenium\\servers\\chromedriver.exe");
		WebDriver driver=new ChromeDriver();
		driver.get("http://localhost/soccer/");
		driver.manage().timeouts().implicitlyWait(50, TimeUnit.SECONDS);
		
		//register
		driver.findElement(By.xpath(".//*[@id='header']/div[2]/div/div/div[2]/div/ul/li[2]/a")).click();
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/input[1]")).sendKeys("sindu");
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/input[2]")).sendKeys("s@gmail.com");
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/input[3]")).sendKeys("sindu11");
		driver.manage().timeouts().implicitlyWait(50, TimeUnit.SECONDS);
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/input[4]")).sendKeys("sindu11");
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/input[5]")).sendKeys("E 10th Street");
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/input[7]")).sendKeys("greenville");
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/input[8]")).sendKeys("27858");
		Select dropdown= new Select(driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/select")));
		dropdown.selectByVisibleText("North Carolina");
		File srcFile=((TakesScreenshot)driver).getScreenshotAs(OutputType.FILE);
		FileUtils.copyFile(srcFile, new File("C:\\Users\\kiran\\Desktop\\register.png"));		
	
		driver.manage().timeouts().implicitlyWait(50, TimeUnit.SECONDS);
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[3]/div/form/button")).click();
		
		driver.get("http://localhost/soccer/");
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
		//login
		driver.findElement(By.xpath(".//*[@id='header']/div[2]/div/div/div[2]/div/ul/li[2]/a")).click();
		
		
		Assert.assertTrue(driver.findElement(By.id("login_input_username")).isDisplayed());
		System.out.println("assert true1 and script continues");
	
	
		
		driver.findElement(By.xpath(".//*[@id='login_input_username']")).sendKeys("sindu");
		
		
		
		Assert.assertEquals ("sindu", driver.findElement(By.id("login_input_username")).getAttribute("value"));
		System.out.println("assert equal and script continues");
	
	
		Assert.assertNotEquals ("b", driver.findElement(By.id("login_input_username")).getAttribute("value"));
		System.out.println("assert not equal and script continues");
		
		driver.manage().timeouts().implicitlyWait(50, TimeUnit.SECONDS);
		driver.findElement(By.xpath(".//*[@id='login_input_password']")).sendKeys("sindu1");
		driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
	
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[1]/div/form/button")).click();
		driver.manage().timeouts().implicitlyWait(50, TimeUnit.SECONDS);
		
		
		Assert.assertTrue(driver.findElement(By.xpath("html/body/div[1]/div[2]/h2/a")).isDisplayed());
		System.out.println("assert true and script continues");
		
		
		driver.findElement(By.xpath("html/body/div[1]/div[2]/h2/a")).click();
		
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
		driver.findElement(By.xpath(".//*[@id='login_input_username']")).sendKeys("sindu");
		driver.manage().timeouts().implicitlyWait(50, TimeUnit.SECONDS);
		driver.findElement(By.xpath(".//*[@id='login_input_password']")).sendKeys("sindu11");
		driver.findElement(By.xpath(".//*[@id='form']/div/div/div[1]/div/form/button")).click();
		
		}

	
		


}
