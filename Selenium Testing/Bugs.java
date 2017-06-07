package soccer;
import org.junit.Assert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;

public class Bugs {

	public static void main(String[] args) throws InterruptedException {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\kiran\\Desktop\\Selenium\\servers\\chromedriver.exe");
		WebDriver driver=new ChromeDriver();
		driver.get("http://localhost/soccer/");
		
		String s3 = driver.findElement(By.cssSelector(".price-range>h2")).getText();
        System.out.println(s3);
        
        System.out.println("Before Price Range");
        driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[3]/div/div/div[1]")).click();
        String s2 = driver.findElement(By.cssSelector(".tooltip-inner")).getText();
        System.out.println(s2);
		
		WebElement sliderA = driver.findElement(By.cssSelector(".slider-handle.round.left-round"));
        WebElement sliderB = driver.findElement(By.cssSelector(".slider-handle.round.left-round"));
        Actions action = new Actions(driver);
        for (int i = 1; i < 2; i++)
        {
            action.dragAndDropBy(sliderA, 50, 0).build().perform();
            Thread.sleep(300);

            action.dragAndDropBy(sliderB, 50, 0).build().perform();                
            Thread.sleep(300);
        }
		
        System.out.println("After Price Range");
        driver.findElement(By.xpath("html/body/section[2]/div/div/div[1]/div/div[3]/div/div/div[1]")).click();
		String s5 = driver.findElement(By.cssSelector(".tooltip-inner")).getText();
        System.out.println(s5);
        
		       
        Assert.assertEquals ("$450", driver.findElement(By.cssSelector(".item_price")).getText());
         
         
         
	}

}
