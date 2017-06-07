package soccer;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
//import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;

public class Slide {

	public static void main(String[] args) {
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
		
		driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
		WebDriverWait w= new WebDriverWait(driver,30);
		w.until(ExpectedConditions.visibilityOfElementLocated(By.xpath(".//*[@id='slider-carousel']/div/div[2]/div[1]/button")));
		
		driver.findElement(By.xpath(".//*[@id='slider-carousel']/div/div[2]/div[1]/button")).click();
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
		driver.findElement(By.cssSelector("input.item_quantity")).clear();
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
	    driver.findElement(By.cssSelector("input.item_quantity")).sendKeys("2");
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
	    driver.findElement(By.xpath("(//button[@type='button'])[2]")).click();
	    
	    
	    System.out.println(driver.switchTo().alert().getText());
	    driver.switchTo().alert().accept();
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
	    driver.findElement(By.xpath(".//*[@id='header']/div[2]/div/div/div[2]/div/ul/li[1]/a")).click();
		driver.manage().timeouts().implicitlyWait(60, TimeUnit.SECONDS);
	    driver.findElement(By.xpath(".//*[@id='header']/div[2]/div/div/div[2]/div/ul/li[3]/a")).click();
	}

	

	

}

